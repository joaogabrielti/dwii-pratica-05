@extends('layouts.app', ['btnURL' => route('cidade.create'), 'btnText' => 'Cadastrar Cidade'])

@section('content')
<x-data-table :head="['id', 'nome', 'porte']" :array="$cidades" :model="'cidade'" />
@endsection
