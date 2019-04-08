<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\QuestionRequest;

use App\Http\Requests\TestsRequest;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use App\Models\Question;

use App\Models\Answer;

use App\Models\Test;

use App\Models\User;

use App\Models\TestQuestion;

use App\Http\Requests\TestResultRequest;

use App\Models\TestResults;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $questions = Question::all();
        $answers = Answer::all();
        return view('questions.index', ['questions' => $questions, 'answers' => $answers]);
    }

    public function index_tests()
    {
        $questions = Question::all();
        $answers = Answer::all();
        $tests = Test::all();
        $testQuestions = TestQuestion::all();
        return view('questions.index_tests', compact(['questions', 'answers', 'tests', 'testQuestions']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        //Сохранение вопросов    
        $questionModel = new Question();

        $questionModel->question = $request->question;
        $questionModel->save();


        //Сохранение ответов, чекбоксов и баллов
        $points = $request->points;
        $correctAnswer = $request->correct_answer;
        foreach ($request->answer as $answer) {
            $answerModel = new Answer();
            $answerModel->answer = $answer;
            $answerModel->question_id = $questionModel->id;

            foreach ($points as $key => $point) {
                $answerModel->points = $point;
                unset($points[$key]);

                if (count($correctAnswer) > 0) {
                    foreach ($correctAnswer as $keyAnswer => $correct) {

                        if ((string)$key == $correct) {
                            $answerModel->status = 'correct';
                            unset($correctAnswer[$keyAnswer]);
                        } else {
                            $answerModel->status = 'wrong';
                        }
                        break;
                    }
                } else {
                    $answerModel->status = 'wrong';
                }
                break;
            }
            $answerModel->save();
        }

        return redirect(route('questions.index'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store_test(TestsRequest $request)
    {

        //Сохранение тестов    
        $testModel = new Test();

        $testModel->test_name = $request->test_name;
        $testModel->save();

        $add_questions = $request->add_question;

        foreach ($add_questions as $add_question) {
            $testQuestionModel = new TestQuestion();
            if (!empty($add_question)) {
                $testQuestionModel->test_id = $testModel->id;
                $testQuestionModel->question_id = $add_question;
            } else {
                continue;
            }
            $testQuestionModel->save();
        }
        return redirect(route('index_tests'));
    }

    /**
     * @param TestResultRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store_test_result(TestResultRequest $request)
    {
        //Сохранение результатов тестов

        $testResults = $request->all();
        $user_id = $testResults['user_id'];
        $test_id = $testResults['test_id'];
        $questions = $testResults['questions'];
        $points = array_sum($questions);

        $testResultsModel = new TestResults();
        $testResultsModel->user_id = $user_id;
        $testResultsModel->test_id = $test_id;
        $testResultsModel->points = $points;
        $testResultsModel->save();

        return redirect(route('home_tested'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);
        $answers = Answer::where('question_id', '=', $id)->get();

        return view('questions.show', ['question' => $question, 'answers' => $answers]);
    }

    public function show_test($id)
    {
        $test = Test::find($id);

        $questionsAndAnswers = TestQuestion::select([
            'test_questions.test_id as id',
            'tests.test_name',
            'questions.question',
            'questions.id as question_id',
            'answers.answer',
            'answers.status as answer_status',
        ])
            ->join('tests', 'test_questions.test_id', '=', 'tests.id')
            ->join('questions', 'test_questions.question_id', '=', 'questions.id')
            ->join('answers', 'questions.id', '=', 'answers.question_id')
            ->where('test_questions.test_id', '=', $id)
            ->get();

        $questions = [];
        foreach ($questionsAndAnswers as $item) {
            if (!array_key_exists($item->question_id, $questions)) {
                $questions[$item->question_id]['questionName'] = $item->question;
                $questions[$item->question_id]['answers'][] = [
                    'answerName' => $item->answer,
                    'answerStatus' => $item->answer_status
                ];
            } else {
                $questions[$item->question_id]['answers'][] = [
                    'answerName' => $item->answer,
                    'answerStatus' => $item->answer_status
                ];
            }
        }

        return view('questions.show_test', compact('test', 'questions'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show_test_for_tested($id)
    {
        //$users = User::where('users.role', '=', 'tested')->get();
        $user = Auth::user();

        $test = Test::find($id);

        $questionsAndAnswers = TestQuestion::select([
            'test_questions.test_id as id',
            'tests.test_name',
            'questions.question',
            'questions.id as question_id',
            'answers.answer',
            'answers.status as answer_status',
            'answers.points',
            'answers.id'
        ])
            ->join('tests', 'test_questions.test_id', '=', 'tests.id')
            ->join('questions', 'test_questions.question_id', '=', 'questions.id')
            ->join('answers', 'questions.id', '=', 'answers.question_id')
            ->where('test_questions.test_id', '=', $id)
            ->get();

        $questions = [];
        foreach ($questionsAndAnswers as $item) {
            if (!array_key_exists($item->question_id, $questions)) {
                $questions[$item->question_id]['questionName'] = $item->question;
                $questions[$item->question_id]['questionId'] = $item->id;
                $questions[$item->question_id]['answers'][] = [
                    'answerName' => $item->answer,
                    'answerStatus' => $item->answer_status,
                    'answerPoints' => $item->points,
                    'answerId' => $item->id
                ];
            } else {
                $questions[$item->question_id]['answers'][] = [
                    'answerName' => $item->answer,
                    'answerStatus' => $item->answer_status,
                    'answerPoints' => $item->points,
                    'answerId' => $item->id
                ];
            }
        }

        return view('questions.show_test_for_tested', compact('test', 'questions', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        $answers = Answer::where('question_id', '=', $id)->get();
        return view('questions.edit', compact(['question', 'answers']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, $id)
    {
        //Сохранение вопросов
        $questionModel = Question::find($id);

        $questionModel->question = $request->question;
        $questionModel->save();

        //Сохранение ответов, чекбоксов и баллов
        $points = $request->points;
        $correctAnswer = $request->correct_answer;
        $answersIds = $request->answers_ids;
        $answers = $request->answer;

        foreach ($answersIds as $answerId) {
            foreach ($answers as $answerKey => $answer) {
                $answerModel = Answer::find($answerId);
                $answerModel->answer = $answer;
                $answerModel->question_id = $questionModel->id;

                foreach ($points as $key => $point) {
                    $answerModel->points = $point;
                    unset($points[$key]);

                    if (count($correctAnswer) > 0) {
                        foreach ($correctAnswer as $keyAnswer => $correct) {
                            if ((string)$key == $correct) {
                                $answerModel->status = 'correct';
                                unset($correctAnswer[$keyAnswer]);
                            } else {
                                $answerModel->status = 'wrong';
                            }
                            break;
                        }
                    } else {
                        $answerModel->status = 'wrong';
                    }
                    $answerModel->save();
                    break;
                }
                unset($answers[$answerKey]);
                break;
            }
        }

        if (!empty($answers)) {
            foreach ($answers as $answerKey => $answer) {
                $answerModel = new Answer();
                $answerModel->answer = $answer;
                $answerModel->question_id = $questionModel->id;

                foreach ($points as $key => $point) {
                    $answerModel->points = $point;
                    unset($points[$key]);

                    if (count($correctAnswer) > 0) {
                        foreach ($correctAnswer as $keyAnswer => $correct) {

                            if ((string)$key == $correct) {
                                $answerModel->status = 'correct';
                                unset($correctAnswer[$keyAnswer]);
                            } else {
                                $answerModel->status = 'wrong';
                            }
                            break;
                        }
                    } else {
                        $answerModel->status = 'wrong';
                    }
                    $answerModel->save();
                    break;
                }
                //unset($answers[$answerKey]);
                //break;
            }
        }

        return redirect(route('questions.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::find($id)->delete();
        //$answers = Answer::where('question_id', '=', $id)->delete();
        return redirect(route('questions.index'));
    }

    public function destroy_test($id)
    {
        $test = Test::find($id)->delete();
        return redirect(route('index_tests'));
    }

    public function testing()
    {
        $questions = Question::all();
        $answers = Answer::all();
        $tests = Test::all();
        $testQuestions = TestQuestion::all();
        return view('questions.testing', compact(['questions', 'answers', 'tests', 'testQuestions']));
    }

    public function results()
    {
        $results = TestResults::select([
            'test_results.id as result_id',
            'test_results.user_id',
            'test_results.test_id',
            'test_results.points',
            'users.id',
            'users.fio as fio',
            'tests.id',
            'tests.test_name'
        ])
            ->join('tests', 'test_results.test_id', '=', 'tests.id')
            ->join('users', 'test_results.user_id', '=', 'users.id')
            ->get();

        return view('questions.results', compact(['results']));
    }
}
