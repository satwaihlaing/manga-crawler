<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use App\Bookmark;
use function GuzzleHttp\json_decode;

class FrontendController extends Controller
{
    public function index()
    {
        $url = "https://mangadex.org/updates";
        $client = new Client();
        $crawler = $client->request('GET', $url);
        
        $showsLinkAndName = $crawler->filter('td .ellipsis > .manga_title')->extract(['_text', 'href']);
        $images = $crawler->filter('.medium_logo > a > img')->extract(['src']);

        // $images = $crawler->filter(".medium_logo > a > img")->each(function ($node) {
        //     return $posts[] = preg_replace('/\s/', '', $node->attr('src'));
        // });

        return view('welcome',compact('showsLinkAndName','images'));
    }

    public function detail(Request $request,$link){
        $url = "https://mangadex.org".$link;
        $client = new Client();
        $crawler = $client->request('GET', $url);

        $image = $crawler->filter('a > .rounded')->extract(['src']);
        $title = $crawler->filter('.card-header > .mx-1')->extract(['_text']);
        $altTitle = $crawler->filter('.col-xl-10 > .m-0 > li  ')->extract(['_text']);
        $altTitleCount = $crawler->filter('.col-xl-10 > .m-0 > li .fa-book ')->extract(['_text']);
        $chapters = $crawler->filter('.chapter-row > .col-lg-5 > a')->extract(['_text','href']);

        $txt = $crawler->filter('.row')->extract(['_text']);
        $author = $this->getName($txt[2]);
        $artist = $this->getName($txt[3]);
        $demographic = $this->getName($txt[4]);
        $genre = $this->getName($txt[6]);
        $status = $this->getName($txt[9]);
        $description = $this->getName($txt[11]);
        
        return view('detail',compact('title','image','author','artist','demographic','genre','status','description','altTitle','altTitleCount','chapters','url'));
    }

    public function getName($name){
        $explode = explode(':',$name);
        $realName = $explode[1];
        return $realName;
    }

    public function read(Request $request, $link){
        $url = "https://mangadex.org/api".$link;
        $client = file_get_contents($url);
        $result = json_decode($client);
        $server = $result->server;
        $hash = $result->hash;
        $url = $server.$hash;
        $pages = $result->page_array;
        
        return view('reader',compact('url','pages'));
        
    }

    public function favourite(Request $request){
        
        $website_info = Bookmark::where('user_id',$request->userID)
        ->where('link',$request->link)
        ->get();

        if (count($website_info) == 0) {
            $bookmark = Bookmark::create([
                'user_id' => $request->userID,
                'title' => $request->title,
                'image' => $request->image,
                'link' => $request->link,
            ]);
        }

        return \Response::json(['message' => 'success']);
    }

}
