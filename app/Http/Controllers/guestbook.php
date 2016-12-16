<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\test;
use Illuminate\Support\Facades\Schema;
use Illuminate\Filesystem\Filesystem;
use \simple_html_dom;
use Symfony\Component\DomCrawler\Crawler;
//use EasyWeChat\Foundation\Application;
use Illuminate\Support\Facades\Cache;

class guestbook extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        if (Cache::has('key')){
//            echo 111;
//        }

//        Cache::store('file')->put('key', test::teemo(), 10);
//        echo Cache::store('file')->get('key');
////        var_dump(Cache::get('ddd'));

//        echo $value = Cache::remember('key', 1, function () {
//            return test::teemo();
//        });

        return view('test.index', ['data' => test::teemo()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('test.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required|max:20', 'text' => 'required']);
//        $result = DB::table('test')->insert([
//            'title' => $request->input('title'),
//            'text' => $request->input('text'),
//            'catalog_id' => 0,
//            'time' => time()
//        ]);
//        $test = new test();
//        $test->title = $request->input('title');
//        $test->text = $request->input('text');
//        $test->catalog_id = 0;
//        $test->time = time();
//        $test->save();

        test::firstOrCreate([
            'title' => $request->input('title'),
            'text' => $request->input('text'),
            'catalog_id' => 0,
            'time' => time()
        ]);

//        if ($result) {
        return redirect('guestbook')->with('msg', '文章发布成功！' . date('Y-m-d H:i:s', time()));
//        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('test')->where('id', $id)->first();
        $prevpage = DB::table('test')->where('id', $data->id - 1)->first();
        $nextpage = DB::table('test')->where('id', $data->id + 1)->first();
        return view('test.show', ['data' => $data, 'prevpage' => $prevpage, 'nextpage' => $nextpage]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('test')->where('id', $id)->first();
        return view('test.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        DB::table('test')->where('id', $id)->update(['text' => $request->input('text'), 'title' => $request->input('title')]);
        $this->validate($request, ['title' => 'required|max:20', 'text' => 'required']);
        $db = test::find($id);
        $db->text = $request->input('text');
        $db->title = $request->input('title');
        if ($db->save()) {
            return redirect("/guestbook/$id/edit")->with('msg', '文章编辑成功');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (test::where('id', $id)->forceDelete()) {
            return redirect('/guestbook')->with('msg', 'ID为 ' . $id . ' 的文章已删除！');
        } else {
            return redirect('/guestbook')->with('msg', '删除失败!ID不存在!');
        }

    }

    public function delete($id)
    {

        $data = DB::table('test')->where('id', $id)->first();
        return view('test.delete', ['data' => $data]);
    }
}
