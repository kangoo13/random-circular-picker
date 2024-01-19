<?php

use App\Http\Controllers\ParticipationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ParticipationController::class, 'index']);
Route::get('/previous-week-participations', [
    ParticipationController::class,
    'previousWeek'
])->name('participations.previous_week');
Route::get('/jwks.json', function () {
    return response()->json([
        "keys" => [
            [
                "p"   => "2MWjzxhgpR9HBOFjSwfo12rumJuTIYPWk28PNmVWwTaY4YEcPcGxG7UT_LYNKxjoSMT7okndMroOihbd-DA2e1FnMuFZCUDs15E_DHQxuv9eVgyJE5o6H4-ccYsXzSK_p7zMngIFbwZxlSkTrZrD6nhS1cdnmBNQqLCuIBEBad8",
                "kty" => "RSA",
                "q"   => "p4THFLDwTJH1Qx0wvVLVvFGur6JeRHR2XVH7ImdvQp9TdWigj8tsS3XXSYcM4RFyb2qtBaozPGgv_JH2FS9xKHqruFMhu2gFFYylVIZgY-03PJ6nrFKqxVagZe_66ESttNcNS91LF6NPcxU9tvRmKgkGZ2KhEGuu96af638VfS8",
                "d"   => "M6Y8mHfVs-nL0fXqanT7Z5UoxCX_QUpxQAhbuAlC0fGQLHYfhYf6FnxAuzrRGCvkU2XBxqXFfduuyC36ojr4_1pHhlzZf8V-2_h1aq3wTcrxqW67iffBkpFW8dtFpR4U7hHVEHAlNwD44lrAnOnVOaxMTyPbvgmyD9sPJ8IIcfyt6V7GfwUo_fbcJx5S6omcEhnBfCtaAHxq7YckbKSOgg342bwWsBvoNUC_7rxs1D7795FnG1fHuHWLLOS9xzF7tjqHRAIqK8zYwwfCLSf0Ut-0kFVkVjuF7X9yw9v7oRTbrukBeNPPuYwMCA5wCCC1Ugubvyaj-dcJvt90peQB_Q",
                "e"   => "AQAB",
                "use" => "sig",
                "kid" => "NHeEDnMmUMdCKinZErkzGAz0xiLjEvzdSJJnmEpkc1E",
                "qi"  => "igzKjvN85XM7TENOUQyFIWghfQGuygyJO092kpz79IOQAwE8X3kQObmqw5aTZM_ul8h2RD7dGzakUbVPYhL0eefofyJf9wOBuiIA9hWaDVdM1RmQ9BIoOXuttZggtgyNgrbgFECYk1vW4BBgkALTy5Y8tZY9XXro6zHtlWCf1GE",
                "dp"  => "Po6i3GQbl-tz0lu9DO0ma-xnGNFk33otlXSqfjc2lyHLcuCQpt3b37QdJYPgPvy8JCv8tnP8iuQYyA8bVcGMJ4BxeMSBrmL3Nqqq-EwcAewqbEjH0kli1rLaIgZTAxcxGhYpMrxAly7T3ojxLduJCIRa22jlY4THdTcvuP9PWh8",
                "alg" => "RS256",
                "dq"  => "Wr-8VYIw-1oKosv6bmWkcftSBcWRCcaJpK5XvOCJzm6feLgwWxWZWhvBgAyQNpEMDD2e87WrQeszK8EqrXlg9MvXoOgwGuUT9AOYQPz21MtaJBXSwbCa4IK4K-DgbNlfvNrPUizUlD6dOLvmDenCOr1e4bz1gf7D71ctxRa4XnM",
                "n"   => "jdlcV7dJwGvKh44S3Rh9hcW1U4vf7_ghq1THrAhQBYoqe5ax1-_Ge1_jalHFhaXpkjCnJSVYZ5nrjRdBj3tEHW37LeiiFXdrSLeXPlU7p64Ib6kHUC77uRksVG5SB50nUcP6kxexuFbwD9Sa80VQgfPmE0pi0wiHngt33yR3YV-oq8qXjTx5s7kGzPz-rSlu_Zdo2p9Mq_nbdWYR6FgQ-SBpZ6D6skWgFLY6FBUC75h7eN64oe4dwSNZKskH-hB7jb9STlElVuXwP3ycKeoYQqITXG-4Dsr0riq8X-hGNcBh4qezSXWhCUBbcH9UpSSf2O4xk1JWu6-7LmmJID9S8Q"
            ]
        ]
    ]);
});
Route::get('/jwks2.json', function () {
    return response()->json([
        "p"   => "2MWjzxhgpR9HBOFjSwfo12rumJuTIYPWk28PNmVWwTaY4YEcPcGxG7UT_LYNKxjoSMT7okndMroOihbd-DA2e1FnMuFZCUDs15E_DHQxuv9eVgyJE5o6H4-ccYsXzSK_p7zMngIFbwZxlSkTrZrD6nhS1cdnmBNQqLCuIBEBad8",
        "kty" => "RSA",
        "q"   => "p4THFLDwTJH1Qx0wvVLVvFGur6JeRHR2XVH7ImdvQp9TdWigj8tsS3XXSYcM4RFyb2qtBaozPGgv_JH2FS9xKHqruFMhu2gFFYylVIZgY-03PJ6nrFKqxVagZe_66ESttNcNS91LF6NPcxU9tvRmKgkGZ2KhEGuu96af638VfS8",
        "d"   => "M6Y8mHfVs-nL0fXqanT7Z5UoxCX_QUpxQAhbuAlC0fGQLHYfhYf6FnxAuzrRGCvkU2XBxqXFfduuyC36ojr4_1pHhlzZf8V-2_h1aq3wTcrxqW67iffBkpFW8dtFpR4U7hHVEHAlNwD44lrAnOnVOaxMTyPbvgmyD9sPJ8IIcfyt6V7GfwUo_fbcJx5S6omcEhnBfCtaAHxq7YckbKSOgg342bwWsBvoNUC_7rxs1D7795FnG1fHuHWLLOS9xzF7tjqHRAIqK8zYwwfCLSf0Ut-0kFVkVjuF7X9yw9v7oRTbrukBeNPPuYwMCA5wCCC1Ugubvyaj-dcJvt90peQB_Q",
        "e"   => "AQAB",
        "use" => "sig",
        "kid" => "NHeEDnMmUMdCKinZErkzGAz0xiLjEvzdSJJnmEpkc1E",
        "qi"  => "igzKjvN85XM7TENOUQyFIWghfQGuygyJO092kpz79IOQAwE8X3kQObmqw5aTZM_ul8h2RD7dGzakUbVPYhL0eefofyJf9wOBuiIA9hWaDVdM1RmQ9BIoOXuttZggtgyNgrbgFECYk1vW4BBgkALTy5Y8tZY9XXro6zHtlWCf1GE",
        "dp"  => "Po6i3GQbl-tz0lu9DO0ma-xnGNFk33otlXSqfjc2lyHLcuCQpt3b37QdJYPgPvy8JCv8tnP8iuQYyA8bVcGMJ4BxeMSBrmL3Nqqq-EwcAewqbEjH0kli1rLaIgZTAxcxGhYpMrxAly7T3ojxLduJCIRa22jlY4THdTcvuP9PWh8",
        "alg" => "RS256",
        "dq"  => "Wr-8VYIw-1oKosv6bmWkcftSBcWRCcaJpK5XvOCJzm6feLgwWxWZWhvBgAyQNpEMDD2e87WrQeszK8EqrXlg9MvXoOgwGuUT9AOYQPz21MtaJBXSwbCa4IK4K-DgbNlfvNrPUizUlD6dOLvmDenCOr1e4bz1gf7D71ctxRa4XnM",
        "n"   => "jdlcV7dJwGvKh44S3Rh9hcW1U4vf7_ghq1THrAhQBYoqe5ax1-_Ge1_jalHFhaXpkjCnJSVYZ5nrjRdBj3tEHW37LeiiFXdrSLeXPlU7p64Ib6kHUC77uRksVG5SB50nUcP6kxexuFbwD9Sa80VQgfPmE0pi0wiHngt33yR3YV-oq8qXjTx5s7kGzPz-rSlu_Zdo2p9Mq_nbdWYR6FgQ-SBpZ6D6skWgFLY6FBUC75h7eN64oe4dwSNZKskH-hB7jb9STlElVuXwP3ycKeoYQqITXG-4Dsr0riq8X-hGNcBh4qezSXWhCUBbcH9UpSSf2O4xk1JWu6-7LmmJID9S8Q"
    ]);
});
