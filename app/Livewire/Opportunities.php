<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class Opportunities extends Component
{
    use WithPagination;

    public $query = '';
    public $sortField = 'name';
    public $sortDirection = 'asc';

    public $perPage = 20; // Default number of items per page
    public $options = [20, 50, 100, 250]; // Options for items per page
    protected $queryString = ['perPage']; // Keep perPage in the URL

    public function search()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function render()
    {
        return view('livewire.opportunities', [
            'items' => \App\Models\Item::with('tags')
                ->where('name', 'like', '%' . $this->query . '%')
                ->distinct()
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate($this->perPage),
        ]);
    }

    public function paginationView()
    {
        return 'livewire.custom-pagination-links-view';
    }
}

