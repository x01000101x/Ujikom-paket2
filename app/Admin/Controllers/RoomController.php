<?php

namespace App\Admin\Controllers;

use App\Models\Kamar;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class RoomController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Kamar';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Kamar());

        $grid->column('id', __('Id'));
        $grid->column('tipe', __('Tipe'));
        $grid->column('avail', __('Avail'));
        $grid->column('harga', __('Harga'));
        $grid->column('diskon', __('Diskon'));
        $grid->column('deskripsi', __('Deskripsi'));
        $grid->column('image', __('Image'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder. <img style="height: 400px;" src="{{url('/images/' . $data['image']) }}" class="card-img-top" alt="...">
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Kamar::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('tipe', __('Tipe'));
        $show->field('avail', __('Avail'));
        $show->field('harga', __('Harga'));
        $show->field('diskon', __('Diskon'));
        $show->field('deskripsi', __('Deskripsi'));
        $show->field('image', __('Image'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Kamar());

        $form->text('tipe', __('Tipe'));
        $form->number('avail', __('Avail'));
        $form->number('harga', __('Harga'));
        $form->number('diskon', __('Diskon'));
        $form->textarea('deskripsi', __('Deskripsi'));
        $form->image('image')->uniqueName();
        // $form->image('image')->thumbnail('small', $width = 300, $height = 300)->uniqueName();


        return $form;
    }
}
