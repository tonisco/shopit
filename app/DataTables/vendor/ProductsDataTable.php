<?php

namespace App\DataTables\vendor;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductsDataTable extends DataTable
{
	/**
	 * Build the DataTable class.
	 *
	 * @param QueryBuilder $query Results from query() method.
	 */
	public function dataTable(QueryBuilder $query): EloquentDataTable
	{
		return (new EloquentDataTable($query))
			->addColumn('action', function ($query) {
				$edit_button = "<a href='" . route('vendor.product.edit', $query->id) . "' class='p-2 bg-blue-500 rounded dark:bg-blue-700'><i class='w-4 h-4 text-white bi bi-pencil-square'></i></a>";

				$delete_button = '<div x-data="toggler">
									<a @click="toggle"  class="p-2 bg-red-500 rounded dark:bg-red-700">
										<i class="w-4 h-4 text-white bi bi-trash"></i>
									</a>
									<template x-teleport="body">
										<div class="trash-table-modal" x-show="open" x-cloak @click="toggle">
											<div class="trash-table-modal-content">
												<i class="absolute bi bi-x top-2 right-2" @click="toggle"></i>
												<h2 class="text-xl text-gray-800 dark:text-gray-200">Are you sure you want to delete <span class="font-semibold">' . $query->name . '</span></h2>
												<p class="text-sm text-gray-800 dark:text-gray-200">This will delete all variants and images that have been added</p>
												<div class="flex items-center self-end gap-2">
													<a class="px-3 py-2 bg-gray-200 shadow-md dark:bg-gray-900 dark:text-gray-200" @click="change(false)">Cancel</a>
													<a href="' . route('vendor.product.destroy', $query->id) . '" class="px-3 py-2 text-white bg-red-500 rounded shadow-md dark:bg-red-700" type="submit">Delete</a>
												</div>
											</div>
										</div>
									</template>
								</div>';

				$edit_button = '<div x-data="toggler" class="relative">
									<a @click="toggle" class="p-2 rounded bg-zinc-700">
										<i class="w-4 h-4 text-white bi bi-three-dots-vertical"></i>
									</a>
									<div @click.outside="toggle" x-show="open" class="product-options">
										<a class="product-options-item">Image Gallery</a>
										<a class="product-options-item">Variants</a>
									</div>
								</div>';
				return $delete_button;
			})
			->addColumn('image', function ($query) {
				return "<img src='" . asset($query->image) . "' alt='" . $query->name . "' class='object-cover w-16'>";
			})
			->rawColumns(['image', 'action'])
			->setRowId('id');
	}

	/**
	 * Get the query source of dataTable.
	 */
	public function query(Product $model): QueryBuilder
	{
		return $model->where('vendor_id', Auth::user()->vendor->id)->with('category')->newQuery();
	}

	/**
	 * Optional method if you want to use the html builder.
	 */
	public function html(): HtmlBuilder
	{
		return $this->builder()
			->setTableId('products-table')
			->columns($this->getColumns())
			->minifiedAjax()
			//->dom('Bfrtip')
			->orderBy(1)
			->selectStyleSingle()
			->buttons([
				Button::make('excel'),
				Button::make('csv'),
				Button::make('pdf'),
				Button::make('print'),
			]);
	}

	/**
	 * Get the dataTable columns definition.
	 */
	public function getColumns(): array
	{
		return [
			Column::make('id'),
			Column::make('image')->width(150),
			Column::make('name'),
			Column::make('price'),
			Column::make('discount'),
			Column::make('approved'),
			Column::computed('action')
				->exportable(false)
				->printable(false)
				->width(60)
				->addClass('text-center'),
		];
	}
	// id
	// name
	// image
	// price
	// discount
	// 13	category_id Index	bigint(20)		UNSIGNED	No	None			Change Change	Drop Drop
	// 14	sub_category_id Index	bigint(20)		UNSIGNED	Yes	NULL			Change Change	Drop Drop
	// 15	brand_id Index	bigint(20)		UNSIGNED	No	None			Change Change	Drop Drop
	// approved
	/**
	 * Get the filename for export.
	 */
	protected function filename(): string
	{
		return 'Products_' . date('YmdHis');
	}
}
