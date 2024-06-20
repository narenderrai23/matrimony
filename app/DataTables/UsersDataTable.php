<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('profile_picture', function (User $user) {
                return '<img src="' . asset($user->profile_picture) . '" class="rounded-full h-10 w-10 object-cover">';
            })
            ->addColumn('action', function ($user) {
                $editUrl = route('admin.users.edit', $user->id);
                $showUrl = route('admin.users.show', $user->id);
                return '<div class="flex items-center space-x-2">
                            <a href="' . $editUrl . '" class="p-1 bg-green-500 text-white rounded-full hover:bg-green-600">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="' . $showUrl . '" class="p-1 bg-blue-500 text-white rounded-full hover:bg-blue-600">
                                <i class="fas fa-eye"></i>
                            </a>
                               <button class="p-1 bg-red-500 text-white rounded-full hover:bg-red-600" onclick="deleteId(' . $user->id . ')" id="row_' . $user->id . '">
                                <i class="far fa-trash-alt"></i>
                             </button>
                        </div>';
            })
            ->rawColumns(['profile_picture', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                // Button::make('csv'),
                // Button::make('pdf'),
                // Button::make('print'),
                // Button::make('reset'),
                // Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('profile_picture'),
            Column::make('name'),
            Column::make('email'),
            Column::make('age'),
            Column::make('gender'),
            Column::make('caste'),
            Column::make('created_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Users_' . date('YmdHis');
    }
}
