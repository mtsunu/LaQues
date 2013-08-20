<?php

use Woodling\Woodling;

Woodling::seed('Survey', ['class' => 'LaQues\Database\Eloquent\Survey', 'do' => function ($blueprint) {
    $blueprint->sequence('id', function($i) {
        return $i;
    });
    $blueprint->title = "Pemahaman tentang ASI Eksklusif";
    $blueprint->description = "Survey tentang Pemahaman tentang ASI Eksklusif";
    $blueprint->questions = function() {
        $q[] = Woodling::retrieve('Question', [
            'label'     => 'Pernahkah Anda mendengar istilah ASI Eksklusif?',
            'type'      => 'yesno'
        ]);
        $q[] = Woodling::retrieve('Question', [
            'label'     => 'Siapakah yang pernah menjelaskan tentang ASI Eksklusif kepada Anda?',
            'type'      => 'multiple_choice',
            'other_choice' => true,
            'answers'   => function() {
                $a[] = Woodling::retrieve('Answer', ['label' => 'Tenaga kesehatan (dokter, bidan, perawat)']);
                $a[] = Woodling::retrieve('Answer', ['label' => 'Majalah atau surat kabar']);
                $a[] = Woodling::retrieve('Answer', ['label' => 'Teman']);
                $a[] = Woodling::retrieve('Answer', ['label' => 'Konselor laktasi']);
                $a[] = Woodling::retrieve('Answer', ['label' => 'Situs internet']);

                return $a;
            }
        ]);
        return $q;
    };
}]);

Woodling::seed('Question', ['class' => 'LaQues\Database\Eloquent\Question', 'do' => function($b) {
    $b->label = "tes";
    $b->type = "yesno";
}]);

Woodling::seed('Answer', ['class' => 'LaQues\Database\Eloquent\Answer', 'do' => function($b) {
    $b->label = "dummy";
}]);