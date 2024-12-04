@extends('layoutadmin.dashboard')
@section('content')
<style>
    .table_deg{
        text-align: center;
        margin: auto;
        border: 2px solid blue;
        margin-top: 50px
    }
    th{
        background-color: skyblue;
        padding: 15px;
        font-size: 20px;
        font-weight: bold;
        color: white
    }
    td{
        color : white;
        padding: 10px;
        border: 1px solid skyblue;
    }
</style>
    <div class="pagetitle">
        <h1>Category</h1>

        <div class="row">
            <div class="col-lg-6">

                <table class="table_deg">
                    <tr>
                        <th>Category</th>
                    </tr>

                    <tr>
                        <td>Window Lock Series</td>
                    </tr>
                </table>

            </div>


        </div>
    @endsection
