<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PostRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PostCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PostCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Post::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/post');
        CRUD::setEntityNameStrings('post', 'posts');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::addColumn([
            'name' => 'user_id', // The db column name
            'label' => "Author", // Table column heading
            // 'type' => 'Text',
            'attribute' => 'name',
        ]);
        CRUD::column('category_id');
        CRUD::column('title');
        // CRUD::column('slug');
        CRUD::column('body');
        CRUD::addColumn([
            'name' => 'image',
            'label' => 'Image',
            'type' => 'image',
            'prefix' => 'storage/'
        ]);
        CRUD::column('active');
        CRUD::column('created_at');


        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(PostRequest::class);

        CRUD::addField([
            'label' => 'User',
            'type' => 'hidden',
            'name' => 'user_id',
            'default' => backpack_user()->id,
        ]);
        CRUD::addField([
            'label' => "Category",
            'type' => 'select', 
            'name' => 'category_id',
            ]);

        CRUD::field('title');
        
        CRUD::addField([
            'name'  => 'slug',
            'target'  => 'title', // will turn the title input into a slug
            'label' => "Slug",
            // 'type'  => 'slug',
        ]);

        CRUD::addField([
            'name'  => 'body',
            'label' => 'Text',
            'type'  => 'summernote',
            'options' => [
                // 'toolbar' => [
                //     ['font', ['bold', 'underline', 'italic']]
                // ]
            ],
        ]);
        CRUD::addField(
            [
                'name'      => 'image',
                'label'     => 'Image',
                'type'      => 'upload',
                'upload'    => true,
            ]
        );

        CRUD::addField([
            'name'  => 'active',
            'type'  => 'switch',
            'label'    => 'Active or not active',
            'default' => 1,
        ]);

        CRUD::column('created_at');

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
