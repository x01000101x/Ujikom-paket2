<?php

namespace App\Admin\Controllers;

use App\Models\Fasilitas;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class FasilitasController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Fasilitas';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Fasilitas());

        $grid->column('id', __('Id'));
        $grid->column('nama', __('Nama'));
        $grid->column('image', __('Image'));
        $grid->column('deskripsi', __('Deskripsi'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Fasilitas::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('nama', __('Nama'));
        $show->field('image', __('Image'));
        $show->field('deskripsi', __('Deskripsi'));
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
        $form = new Form(new Fasilitas());

        $form->text('nama', __('Nama'));
        // $form->textarea('image', __('Image'));

        // change upload path
        $form->image('image')->uniqueName();

        // $form->image('image');

        $form->textarea('deskripsi', __('Deskripsi'));

        return $form;
    }
}
