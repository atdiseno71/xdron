@extends('layouts.app-pdf')

@section('title', 'Reporte de productos')

@section('content')
    @include('template.cabezote')
    <table width="100%" style="margin-top:2%">
        <thead>
            <tr>
                <td class="ocultarcolumnas" style="width: 2%">1</td>
                <td class="ocultarcolumnas" style="width: 2%">2</td>
                <td class="ocultarcolumnas" style="width: 2%">3</td>
                <td class="ocultarcolumnas" style="width: 2%">4</td>
                <td class="ocultarcolumnas" style="width: 2%">5</td>
                <td class="ocultarcolumnas" style="width: 2%">6</td>
                <td class="ocultarcolumnas" style="width: 2%">7</td>
                <td class="ocultarcolumnas" style="width: 2%">8</td>
                <td class="ocultarcolumnas" style="width: 2%">9</td>
                <td class="ocultarcolumnas" style="width: 2%">10</td>
                <td class="ocultarcolumnas" style="width: 2%">11</td>
                <td class="ocultarcolumnas" style="width: 2%">12</td>
                <td class="ocultarcolumnas" style="width: 2%">13</td>
                <td class="ocultarcolumnas" style="width: 2%">14</td>
                <td class="ocultarcolumnas" style="width: 2%">15</td>
                <td class="ocultarcolumnas" style="width: 2%">16</td>
                <td class="ocultarcolumnas" style="width: 2%">17</td>
                <td class="ocultarcolumnas" style="width: 2%">18</td>
                <td class="ocultarcolumnas" style="width: 2%">19</td>
                <td class="ocultarcolumnas" style="width: 2%">20</td>
                <td class="ocultarcolumnas" style="width: 2%">21</td>
                <td class="ocultarcolumnas" style="width: 2%">22</td>
                <td class="ocultarcolumnas" style="width: 2%">23</td>
                <td class="ocultarcolumnas" style="width: 2%">24</td>
                <td class="ocultarcolumnas" style="width: 2%">25</td>
                <td class="ocultarcolumnas" style="width: 2%">26</td>
                <td class="ocultarcolumnas" style="width: 2%">27</td>
                <td class="ocultarcolumnas" style="width: 2%">28</td>
                <td class="ocultarcolumnas" style="width: 2%">29</td>
                <td class="ocultarcolumnas" style="width: 2%">30</td>
                <td class="ocultarcolumnas" style="width: 2%">31</td>
                <td class="ocultarcolumnas" style="width: 2%">32</td>
                <td class="ocultarcolumnas" style="width: 2%">33</td>
                <td class="ocultarcolumnas" style="width: 2%">34</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="34" rowspan="4">
                    <img style="width:70%;height: 400px;" src="{{ $evidencia_record }}">
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="34" rowspan="4">
                    <img style="width:70%;height: 400px;" src="{{ $evidencia_track }}">
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="34" rowspan="4">
                    <img style="width:70%;height: 400px;" src="{{ $evidencia_gps }}">
                </td>
            </tr>
            <tr></tr>
        </tbody>
    </table>
@endsection
