<?php

namespace App\DataTables;

use App\TagtypeManager;
use Yajra\DataTables\Services\DataTable;

class TagtypeManagerDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('action', function ($row){
                return $this->actionsView($row);
            })
            ->editColumn('name', function ($row){
                return str_limit($row->name, 20);
            })
            ->editColumn('map_type', function ($row){
                return str_limit($row->map_type, 20);
            })
            ->editColumn('type', function ($row){
                return str_limit($row->type, 20);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(TagtypeManager $model)
    {
        return $model->newQuery()->with(['TagManager'])->where(["type" => request()->query('type'), "map_type" => request()->query('map')])->select('id', 'map_type', 'name', 'type', 'created_at', 'updated_at');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->addAction(['width' => '80px'])
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ' ' => [
                "className" => 'details-control',
                "orderable" => false,
                "data" => null,
                "defaultContent" => ''
            ],
            'id' => [],
            'map_type' => [],
            'name' => [],
            'type' => []
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'TagtypeManager_' . date('YmdHis');
    }

    public function actions($row) : Array{
        return $actions = [
            [
                'title' => 'Edit',
                'href' => route('tag-manager.edit', $row),
                'type' => 'primary',
                'id' => $row->id
            ],
            [
                'id' => $row->id,
                'title' => 'Delete',
                'href' => route('tag-manager.destroy', $row),
                'type' => 'danger',
                'delete_route' => true,
            ]
        ];
    }

    public function actionsView($row)
    {
        return view('components.datatable_actions', array(
            'actions' => $this->actions($row)
        ));
    }
}
