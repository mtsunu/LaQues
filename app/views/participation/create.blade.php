<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap 101 Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('css/application.css') }}" rel="stylesheet" media="screen">
</head>
<body>

<div id="participationForm" class="container">

    <div class="heading">
        <h4 class="title">
            {{ $survey->title }}
        </h4>
        <small>{{ $survey->description }}</small>
    </div>

    <div class="questions">
        <div class="container" style="width: 75%;">

            @foreach ($survey->questions as $question)

            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $question->label }}</h3>
                </div>
                <div class="panel-body">
                    {{ $question->renderAnswers() }}
                </div>
            </div>

            @endforeach

        </div>
    </div>

</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="//code.jquery.com/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

<!-- Enable responsive features in IE8 with Respond.js (https://github.com/scottjehl/Respond) -->
<script src="js/respond.js"></script>
</body>
</html>
