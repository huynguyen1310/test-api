<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\LessonFilters;
use App\QueryFilter;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LessonFilters $filters)
    {
        return Lesson::filter($filters)->get();
    }
}
