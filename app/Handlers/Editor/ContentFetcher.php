<?php

namespace App\Handlers\Editor;

class ContentFetcher
{
    public function run($url)
    {
        $homepage = curlit($url);

        if (!$homepage) {
            return array('status' => 'error', 'title' => trans('updates.error'), 'error' => trans('updates.nodata'));
        }

        $tags = $this->getMetaTags($homepage);

        if (empty($tags)) {
            return array('status' => 'error', 'title' => trans('updates.error'), 'error' => trans('updates.nodata'));
        }

        preg_match_all('#<p>(.*)</p>#isU', $homepage, $matches);

        $data = [];
        $title = null;
        $image = null;
        $description = null;
        $body = null;

        foreach ($matches[0] as $value) {
            $body .= $value;
        }

        if (isset($tags['title'])) {
            $title = $tags['title'];
        } elseif (isset($tags['twitter:title'])) {
            $title = $tags['twitter:title'];
        } elseif (isset($tags['article:title'])) {
            $title = $tags['article:title'];
        }

        if (isset($tags['og:image'])) {
            $image = $tags['og:image'];
        } elseif (isset($tags['twitter:image'])) {
            $image = $tags['twitter:image'];
        } elseif (isset($tags['article:image'])) {
            $image = $tags['article:image'];
        } elseif (isset($tags['image'])) {
            $image = $tags['image'];
        }

        if (isset($tags['og:description'])) {
            $description = $tags['og:description'];
        } elseif (isset($tags['description'])) {
            $description = $tags['description'];
        } elseif (isset($tags['article:description'])) {
            $description = $tags['article:description'];
        }

        $data['headline'] = strip_tags($title);
        $data['description'] = strip_tags($description);
        $data['preview'] = $image;

        $allowed_tags = array(
            "<a>", "<b>", "strong", "<br>", "<span>", "<em>", "<img>", "<hr>", "<i>",
            "<h1>", "<h2>", "<h3>", "<h4>", "<h5>", "<h6>",
            "<li>", "<ol>", "<p>", "<s>", "<span>", "<u>", "<ul>",
            "<code>", "<time>", "<data>", "<abbr>", "<dfn>", "<q>", "<cite>", "<s>", "<small>",
            "<strong>", "<em>", "<a>", "<div>", "<figcaption>", "<figure>", "<dd>", "<dt>",
            "<dl>",  "<blockquote>", "<pre>", "<address>",
            "<th>", "<td>", "<tr>", "<tfoot>", "<thead>", "<tbody>",
        );

        $entry = new \stdClass();
        $entry->title = $title;
        $entry->body = strip_tags($body, implode('', $allowed_tags));

        $data['entries'] = view('_forms.__addtextform')->with(compact('entry'))->render();

        return $data;
    }


    public function getMetaTags($str)
    {
        $pattern = '
      ~<\s*meta\s

      # using lookahead to capture type to $1
        (?=[^>]*?
        \b(?:name|property|http-equiv)\s*=\s*
        (?|"\s*([^"]*?)\s*"|\'\s*([^\']*?)\s*\'|
        ([^"\'>]*?)(?=\s*/?\s*>|\s\w+\s*=))
      )

      # capture content to $2
      [^>]*?\bcontent\s*=\s*
        (?|"\s*([^"]*?)\s*"|\'\s*([^\']*?)\s*\'|
        ([^"\'>]*?)(?=\s*/?\s*>|\s\w+\s*=))
      [^>]*>

      ~ix';

        if (preg_match_all($pattern, $str, $out))
            return array_combine($out[1], $out[2]);
        return array();
    }
}
