<!DOCTYPE html>

<html>

<head>

    <title>Docket</title>

    <style type="text/css">
        ul li {
            margin:1em 0;
        }
    </style>

</head>

<body>

<h2>Docket for student: {{ $name }}</h2>

<ul>
    <li>
        Student ID: {{$id}}
    </li>
    <li>
        Student Name: {{$name}}
    </li>
    <li>
        Student TP: {{$tp}}
    </li>
    <li>
        Exam: {{$examName}}
    </li>
    <li>
        Docket: {{$docket}}
    </li>
    <li>
        Start Date & Time: {{$start_date}}
    </li>
    <li>
        Duration: {{$duration}}
    </li>
</ul>


</body>

</html>