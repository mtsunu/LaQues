<?php
$I = new TestGuy\ParticipantViewingASurveySteps($scenario);
$I->wantTo('view a survey');

// Given
$survey = $I->haveASurvey(array(
    'title'             => 'Pemahaman tentang ASI Eksklusif',
    'description'       => 'Survey tentang Pemahaman tentang ASI Eksklusif',
    'questions'         => array(
        array(
            'label'     => 'Pernahkah Anda mendengar istilah ASI Eksklusif?',
            'type'      => 'yesno'
        ),
        array(
            'label'     => 'Siapakah yang pernah menjelaskan tentang ASI Eksklusif kepada Anda?',
            'type'      => 'multiple_choice',
            'answers'   => array(
                'Tenaga kesehatan (dokter, bidan, perawat)',
                'Majalah atau surat kabar',
                'Teman',
                'Konselor laktasi',
                'Situs internet'
            ),
            'other_choice' => true
        ),
        array(
            'label'     => 'Menurut Anda, bayi yang sedang ASI eksklusif itu:',
            'type'      => 'choice',
            'answers'   => array(
                'Hanya boleh minum ASI saja tanpa cairan lain (air putih/air gula/susu formula dll)',
                'Terutama minum ASI, tapi tetap boleh mendapat tambahan lain',
                'Minum ASI dan mengkonsumsi Makanan Pendamping ASI (MPASI)',
                'Minum ASI, tapi juga mendapat cairan lain serta MPASI'
            )
        )
    )
));
//die(var_dump($survey));
// When
$I->amOnPage('survey/'.$survey->id.'/participate');

// Then
$I->canSee($survey->title);
$I->canSee($survey->description);
foreach($survey->questions as $question) {
    $I->canSee($question->label);
    foreach($question->answers as $answer) {
        $I->canSee($answer->label);
    }
}