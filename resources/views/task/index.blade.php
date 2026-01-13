@extends('layouts.app')
@section('page-title', 'Tarefas')

@section('content')

<div class="container mt-4 py-2">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold text-dark-emphasis" data-bs-theme="dark">
            <i class="bi bi-{{ $active ? "pin" : "archive" }} text-dark-emphasis" data-bs-theme="dark"></i>
             Tarefas {{ $active ? "Ativas" : "Arquivadas" }}
        </h3>

        @if ($active)
            <div class="d-flex gap-2">
                <a class="btn btn-outline-warning bs-dark" data-bs-title="Clique para acessar as tarefas <b>arquivadas</b>."
                data-bs-html="true" data-bs-placement="left" data-bs-offset="0,10"
                href="{{ route('tasks.trash') }}">
                    <i class="bi bi-archive me-1"></i> Arquivadas
                </a>

                <button class="btn btn-primary bs-dark" data-bs-title="Clique para <b>CRIAR</b> uma nova tarefa."
                data-bs-html="true" data-bs-placement="right" data-bs-offset="0,10"
                data-bs-toggle="modal" data-bs-target="#createTaskModal">
                    <i class="bi bi-plus-lg me-1"></i> Nova tarefa
                </button>
            </div>
        @else
            <div class="d-flex gap-2">
                @if ($tasks->count() > 1)
                    <button
                        class="btn btn-danger btn-sm p-2"
                        data-bs-toggle="modal"
                        data-bs-target="#deleteTaskModal"
                        data-bs-delAll="true"
                        data-bs-html="true"
                        data-bs-title="Clique para <b>EXCLUIR</b> a tarefa permanentemente."
                        data-bs-taskCount="{{ $tasks->total() }}"
                    >
                            <i class="bi bi-trash-fill"></i>
                            Excluir tudo
                    </button>
                @endif

                <a class="btn btn-outline-primary bs-dark" data-bs-title="Clique para voltar para as tarefas <b>ativas</b>."
                data-bs-html="true" data-bs-placement="left" data-bs-offset="0,10"
                href="{{ route('tasks.index') }}">
                    <i class="bi bi-arrow-left me-1"></i> Voltar
                </a>
            </div>
        @endif
    </div>
    
    @if ($tasks->isEmpty())
        <div class="card w-100">
            <div class="card-body d-flex justify-content-center align-items-center" style="min-height: 100px;">
                <span class="text-secondary">Nenhuma tarefa encontrada...</span>
            </div>
        </div>
    @else
        <div class="d-flex flex-column gap-2">
            @foreach ($tasks as $task)
                <div class="card shadow-sm border-0" style="{{ $active ? "" : "opacity: 0.75;" }}">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center gap-3">
                                {{-- Icone Completed --}}
                                <i class="bi bi-{{ $task->completed ? "check-circle-fill text-success" : "circle" }} fs-4"></i>
                                
                                {{-- Titulo e Descrição --}}
                                <div class="d-flex flex-column">
                                    <span class="fw-bold">{{ $task->title }}</span>
                                    <span class="text-secondary small">{{ $task->description }}</span>
                                </div>
                            </div>
                            
                            <div class="d-flex gap-2">
                                @if ($active)
                                    {{-- Botao Editar --}}
                                    <button
                                        class="btn btn-outline-primary btn-sm p-2"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editTaskModal"
                                        data-bs-taskId="{{ $task->id }}"
                                        data-bs-taskTitle="{{ $task->title }}"
                                        data-bs-taskDesc="{{ $task->description }}"
                                        data-bs-taskToggle="{{ $task->completed }}"
                                        data-bs-html="true"
                                        data-bs-title="Clique para <b>EDITAR</b> a tarefa.">
                                            <i class="bi bi-pencil-fill"></i>
                                    </button>
                                    
                                    {{-- Botao Arquivar --}}
                                    <form action="{{ route('tasks.archive', [$task->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-outline-warning btn-sm p-2"
                                            data-bs-html="true"
                                            data-bs-title="Clique para <b>ARQUIVAR</b> a tarefa.">
                                                <i class="bi bi-archive-fill"></i>
                                        </button>
                                    </form>
                                @else
                                    {{-- Botao Desarquivar --}}
                                    <form action="{{ route('tasks.restore', [$task->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button
                                            type="submit"
                                            class="btn btn-outline-success btn-sm p-2"
                                            data-bs-html="true"
                                            data-bs-title="Clique para <b>RESTAURAR</b> a tarefa.">
                                                <i class="bi bi-arrow-bar-up"></i>
                                        </button>   
                                    </form>

                                    {{-- Botao Excluir --}}
                                    <button
                                        class="btn btn-outline-danger btn-sm p-2"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteTaskModal"
                                        data-bs-taskId="{{ $task->id }}"
                                        data-bs-html="true"
                                        data-bs-title="Clique para <b>EXCLUIR</b> a tarefa permanentemente.">
                                            <i class="bi bi-trash-fill"></i>
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>   
            @endforeach
            {{ $tasks }}
        </div>
    @endif
</div>
@endsection