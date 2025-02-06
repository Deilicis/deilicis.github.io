@extends('layouts.adminLayout')
@section('title', 'Dashboard')
@section('content')
<div class="content">
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <main>
        <h1>Problēmas</h1>
        <section class="problems">
            <!-- First problemHolder (Table of problems) -->
            <div class="problemHolder">
                <table class="table">
                    <tr class="table-head">
                        <th>@sortablelink('id', 'ID')</th>
                        <th>@sortablelink('nozare', 'Nozare')</th>
                        <th>@sortablelink('virsraksts', 'Virsraksts')</th>
                        <th>@sortablelink('apraksts', 'Apraksts')</th>
                        <th>@sortablelink('laiks', 'Laiks')</th>
                        <th>@sortablelink('epasts', 'Epasts')</th>
                    </tr>
                    @foreach ($problems as $problem)
                        <tr class="problemTable-row" data-id="{{ $problem->id }}">
                            <td><p>{{ $problem->id }}</p></td>
                            <td><p>{{ $problem->nozare }}</p></td>
                            <td><p>{{ $problem->virsraksts }}</p></td>
                            <td><p id="truncate">{{ $problem->apraksts }}</p></td>
                            <td>
                                @if ($problem->laiks == null)
                                    <p>-</p>
                                @else
                                    <p>{{ $problem->laiks }}</p>
                                @endif
                            </td>
                            <td><p>{{ $problem->epasts }}</p></td>
                        </tr>
                    @endforeach
                </table> 
            </div>
            <div class="problemHolder" id="problemDetails">
                <div>
                    <h1>Problēmas detaļas</h1>
                    <div id="detailsContent">
                        <p id="defaultMessage">Izvēlieties problēmu, lai redzētu tās detaļas</p>
                    </div>
                    <div id="detailsActions">
                        <button id="deleteButton" class="btn delete-button" style="display: none;">Dzēst problēmu</button>
                    </div>
                </div>
            </div>
            <div class="pagination">
                {{ $problems->appends(request()->except('page'))->links() }}
            </div>
        </section>
    </main>
</div>
@endsection