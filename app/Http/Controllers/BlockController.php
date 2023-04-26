<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Block;
use App\Models\Post;

class BlockController extends Controller
{
    // Block 表示
    public function index(Block $block)
    {
        return view('blocks/index')->with(['blocks' => $block->get()]);
    }
    
    // Block 条件表示
    public function getFromBlocks(Block $block, Post $post, Request $request)
    {
        $query = $request->query()['block'];
        
        $blocks = $block->get();
        foreach($blocks as $block)
        {
            // 作成日検索
            $serchRes = $block->posts()->where('created_at', '>=', $query['fromDate'])->first();
            
            $block['search_flg'] = false;
            if(!empty($serchRes))
            {
                $block['search_flg'] = true;
            }
        }
        
        return view('blocks/searchIndex')->with(['blocks' => $blocks]);
    }
}
