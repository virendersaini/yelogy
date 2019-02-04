<?php

namespace App\DataTables;

use App\Alert;
use Yajra\DataTables\Services\DataTable;

class AlertDataTable extends DataTable
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
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Alert $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Alert $model)
    {
        return $model->newQuery()->select('id', 'title', 'event', 'template_type', 'fire', 'created_at', 'updated_at'); 
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
            'title',
            'event',
            'template_type',
            'fire'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Alert_' . date('YmdHis');
    }

     public function actions($row) : Array
    {
        return $actions = [
            [
                'title' => 'Edit',
                'href' => route('email-templates.edit', $row),
                'type' => 'primary',
            ],
            [
                'id' => $row->id,
                'title' => 'Delete',
                'href' => route('email-templates.destroy', $row),
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
