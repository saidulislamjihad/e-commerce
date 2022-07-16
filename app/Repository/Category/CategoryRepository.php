<?php

namespace App\Repository\Category;

use App\Models\Category;
use App\Repository\Interface\CategoryInterface;

class CategoryRepository implements CategoryInterface
{
    public function getAllData()
    {
        return Category::orderBy('created_at', 'desc')->paginate(10);
    }

    public function storeOrUpdate($id = null, $data = [])
    {
        if(is_null($id)){
            if ($data['image']){
                $image = time().'.'. $data['image']->extension();
                $data['image']->move(public_path('category'), $image);
            }

            $category = new Category();
            $category->name = $data['name'];
            $category->image = $image;
            $category->slug = str_replace(' ', '-', strtolower($data['name']));
            $category->save();
        }else {
            $category = Category::find($id);
            if (isset($data['image'])){
                if ($data['image']){
                    file_exists(('category/').$category['image']);
                }
                $updateImage = time().'.'. $data['image']->extension();
    
                $data['image']->move(public_path('category'), $updateImage);
                $category['image'] = $updateImage;
            }
            $category->name = $data['name'];
            $category->slug = str_replace(' ', '-', strtolower($data['name']));
            $category->save();
        }
    }

    public function edit($id)
    {
        return Category::find($id);
    }

    public function active($id)
    {
        $activeCategory = Category::find($id);
        $activeCategory->status = 0;
        $activeCategory->save();
        return $activeCategory;
    }

    public function inactive($id)
    {
        $inactiveCategory = Category::find($id);
        $inactiveCategory->status = 1;
        $inactiveCategory->save();
        return $inactiveCategory;
    }

    public function delete($id)
    {
        return Category::find($id)->delete();
    }
}
