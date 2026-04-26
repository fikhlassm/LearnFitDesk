<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    /**
     * Show the quiz page.
     * Only accessible if the user has not completed the quiz yet.
     */
    public function show()
    {
        $user = Auth::user();

        // If already done quiz → go straight to result
        if ($user->quiz_result) {
            return redirect()->route('quiz.result');
        }

        return view('quiz.quiz');
    }

    /**
     * Process submitted quiz answers and determine the best learning method.
     *
     * Scoring logic:
     *   Each answer maps to one of four methods:
     *     P = Pomodoro, A = Active Recall, B = Blurting, F = Feynman
     *
     *   The method with the highest accumulated score wins.
     */
    public function submit(Request $request)
    {
        $answers = $request->input('answers', []);

        // Answer → method score mapping
        // Format: 'q{n}_{option}' => ['method' => points]
        $scoreMap = [
            // Q1: Bagaimana cara terbaikmu memahami materi baru?
            'q1_visual'      => ['A' => 2, 'B' => 1],
            'q1_auditori'    => ['F' => 2, 'A' => 1],
            'q1_membaca'     => ['B' => 2, 'F' => 1],
            'q1_kinestetik'  => ['P' => 2, 'B' => 1],

            // Q2: Berapa lama kamu bisa fokus tanpa istirahat?
            'q2_15menit'     => ['P' => 3],
            'q2_30menit'     => ['P' => 2, 'A' => 1],
            'q2_1jam'        => ['A' => 2, 'B' => 1],
            'q2_lebih'       => ['F' => 2, 'B' => 1],

            // Q3: Apa yang kamu lakukan saat lupa materi?
            'q3_baca_ulang'  => ['B' => 2, 'F' => 1],
            'q3_rangkum'     => ['B' => 3],
            'q3_tanya'       => ['F' => 2, 'A' => 1],
            'q3_latihan'     => ['A' => 3],

            // Q4: Lingkungan belajar yang paling cocok?
            'q4_tenang'      => ['B' => 2, 'A' => 1],
            'q4_musik'       => ['P' => 2, 'F' => 1],
            'q4_ramai'       => ['F' => 2, 'P' => 1],
            'q4_alam'        => ['P' => 3],

            // Q5: Cara kamu menguji pemahaman?
            'q5_latihan'     => ['A' => 3],
            'q5_tutor'       => ['F' => 3],
            'q5_tulis_ulang' => ['B' => 3],
            'q5_jadwal'      => ['P' => 3],

            // Q6: Kapan waktu belajar terbaikmu?
            'q6_pagi'        => ['P' => 2, 'A' => 1],
            'q6_siang'       => ['F' => 2, 'B' => 1],
            'q6_sore'        => ['B' => 2, 'F' => 1],
            'q6_malam'       => ['A' => 2, 'P' => 1],

            // Q7: Tujuan belajarmu saat ini?
            'q7_ujian'       => ['A' => 2, 'P' => 1],
            'q7_pemahaman'   => ['F' => 3],
            'q7_skill'       => ['P' => 2, 'B' => 1],
            'q7_hafal'       => ['B' => 3],
        ];

        $scores = ['P' => 0, 'A' => 0, 'B' => 0, 'F' => 0];

        foreach ($answers as $questionKey => $optionValue) {
            $mapKey = $questionKey . '_' . $optionValue;
            if (isset($scoreMap[$mapKey])) {
                foreach ($scoreMap[$mapKey] as $method => $pts) {
                    $scores[$method] += $pts;
                }
            }
        }

        // Find the winner
        arsort($scores);
        $winner = array_key_first($scores);

        $methodMap = [
            'P' => 'pomodoro',
            'A' => 'active_recall',
            'B' => 'blurting',
            'F' => 'feynman',
        ];

        $result = $methodMap[$winner];

        // Save to user
        $user = Auth::user();
        $user->quiz_result = $result;
        $user->save();

        return redirect()->route('quiz.result');
    }

    /**
     * Show the quiz result page.
     */
    public function result()
    {
        $user = Auth::user();

        if (!$user->quiz_result) {
            return redirect()->route('quiz');
        }

        return view('quiz.result', ['result' => $user->quiz_result]);
    }
}
