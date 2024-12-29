<x-main-layout pageTitle="Countries 6 Capitals Quiz">
    <div class="container">
        <x-question :country="$country" :currentQuestion="$currentQuestion" :totalQuestions="$totalQuestion" />
        <div class="row">
            <div class="col-6 text-center">
                <p class="response-option">[CAPITAL 1]</p>
            </div>

            <div class="col-6 text-center">
                <p class="response-option">[CAPITAL 2]</p>
            </div>

            <div class="col-6 text-center">
                <p class="response-option">[CAPITAL 3]</p>
            </div>

            <div class="col-6 text-center">
                <p class="response-option">[CAPITAL 4]</p>
            </div>

        </div>
    </div>

    <!-- cancel game -->
    <div class="text-center mt-5">
        <a href="#" class="btn btn-outline-danger mt-3 px-5">CANCELAR JOGO</a>
    </div>
    </x-main-layout>
