<?php

namespace App\Http\Controllers;

use Embed\Embed;
use Illuminate\Http\Request;
use App\Handlers\Editor\QuizFetcher;
use App\Http\Controllers\Controller;
use App\Handlers\Editor\ContentFetcher;

class FormController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->middleware('auth');
    }


    public function addnewform(Request $request)
    {
        if (!$request->ajax()) {
            return redirect('/');
        }

        if ($request->query('addnew') == 'text') {
            return view('_forms.__addtextform');
        } elseif ($request->query('addnew') == 'image') {
            return view('_forms.__addimageform');
        } elseif ($request->query('addnew') == 'poll') {
            return view('_forms._buzzypoll.__addpollform');
        } elseif ($request->query('addnew') == 'embed') {
            return view('_forms.__addembedform');
        } elseif ($request->query('addnew') == 'video') {
            return view('_forms.__addvideoform');
        } elseif ($request->query('addnew') == 'tweet') {
            return view('_forms.__addspecialentryform', [
                'typeofwidget' => 'tweet',
                'titleofwidget' => trans('updates.tweet'),
                'iconofwidget' => 'fa-twitter',
                'urlto' => trans('updates.urltotweet'),

            ]);
        } elseif ($request->query('addnew') == 'facebookpost') {
            return view('_forms.__addspecialentryform', [
                'typeofwidget' => 'facebookpost',
                'titleofwidget' => trans('updates.facebookpost'),
                'iconofwidget' => 'fa-facebook',
                'urlto' => trans('updates.urltofacebookpost'),

            ]);
        } elseif ($request->query('addnew') == 'instagram') {
            return view('_forms.__addspecialentryform', [
                'typeofwidget' => 'instagram',
                'titleofwidget' => trans('updates.instagram'),
                'iconofwidget' => 'fa-instagram',
                'urlto' => trans('updates.urltoinstagram'),

            ]);
        } elseif ($request->query('addnew') == 'soundcloud') {
            return view('_forms.__addspecialentryform', [
                'typeofwidget' => 'soundcloud',
                'titleofwidget' => trans('updates.soundcloud'),
                'iconofwidget' => 'fa-soundcloud',
                'urlto' => trans('updates.urltosoundcloud'),

            ]);
        } elseif ($request->query('addnew') == 'question') {
            return view('_forms._buzzyquiz.__addquestionform');
        } elseif ($request->query('addnew') == 'result') {
            return view('_forms._buzzyquiz.__addresultform');
        } elseif ($request->query('addnew') == 'answer') {
            return view('_forms._buzzyquiz.__addanswerform');
        } elseif ($request->query('addnew') == 'pollanswer') {
            return view('_forms._buzzypoll.__addanswerform');
        }
    }


    public function fetchVideoEmbed(Request $request)
    {

        if (!$request->ajax()) {
            return redirect('/');
        }

        $url = $request->input('url');

        // incase if $thumb then tuse save button. we need to save image for that
        try {
            if (!$url) {
                throw new \Exception(trans('updates.BuzzyEditor.lang.lang_11'));
            }

            if (strpos($url, 'instagram') !== false) {
                static $number;
                $c_number = $number++;

                return [
                    'status' => 'success',
                    'url' =>  $url,
                    //  'title' => $embed->title,
                    //    'image' => $embed->image,
                    // 'authorName' => $embed->authorName,
                    'html' => '<div class="embed-containera">
                        <iframe id="instagram-embed-' . $c_number . '" src="' . $url . 'embed/captioned/?v=5" allowtransparency="true" frameborder="0" data-instgrm-payload-id="instagram-media-payload-' . $c_number . '" scrolling="no" style="border: 0; margin: 1px; max-width: 658px; width: calc(100% - 2px); border-radius: 4px; box-shadow: rgba(0, 0, 0, 0.498039) 0px 0px 1px 0px, rgba(0, 0, 0, 0.14902) 0px 1px 10px 0px; display: block; padding: 0px; background: rgb(255, 255, 255);"></iframe>
                        <script async defer src="//platform.instagram.com/' . get_buzzy_config("sitelanguage", "en_US") . '/embeds.js"></script>
                    </div>'
                ];
            }

            $embed = Embed::create($url, [
                'min_image_width' => 800,
                'min_image_height' => 400,
                'choose_bigger_image' => true,
                'oembed' => [
                    'parameters' => [],
                    'embedly_key' => env('EMBEDLY_KEY', null),
                    'iframely_key' => env('IFRAMELY_KEY', null),
                ]
            ]);

            if (empty($embed->code)) {
                throw new \Exception(trans('updates.BuzzyEditor.lang.lang_11'));
            }

            return [
                'status' => 'success',
                'url' => $embed->providerName === 'Instagram' ? $url : $embed->url,
                'title' => $embed->title,
                'image' => $embed->image,
                'authorName' => $embed->authorName,
                'html' => $embed->code
            ];
        } catch (\Exception $e) {
            return ['status' => 'error', 'title' => trans('updates.error'), 'message' => $e->getMessage()];
        }
    }


    public function get_content_data(Request $request)
    {
        $url = $request->input('dataurl');
        $type = $request->input('type');
        try {
            if (!$url) {
                throw new \Exception(trans('updates.BuzzyEditor.lang.lang_11'));
            }

            if ($type > '') {
                return app(QuizFetcher::class)->run($url, $type);
            }

            $data = app(ContentFetcher::class)->run($url);

            return $data;
        } catch (\Exception $e) {
            return ['status' => 'error', 'title' => trans('updates.error'), 'error' => $e->getMessage()];
        }
    }
}
