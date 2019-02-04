<?php

namespace App\DataTables;

use App\EmailTemplate;
use Yajra\DataTables\Services\DataTable;

class EmailTemplateDataTable extends DataTable
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
            ->editColumn('title', function ($row){
                return str_limit($row->title,30);
            })
            ->editColumn('subject', function ($row){
                return str_limit($row->subject,50);
            })
            ->editColumn('status', function ($row){
                return $row->status_text;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\EmailTemplate $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(EmailTemplate $model)
    {
        return $model->newQuery()->select([
            'id', 
            'title',
            'subject',
            'status',
            'created_at', 
            'updated_at'
        ]);
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
                    ->addAction(['width' => '180px'])
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
            'title' => [],
            'subject' => ['searchable' => false, 'orderable' => false],
            'status' => [],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Email_Template_' . date('YmdHis');
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
