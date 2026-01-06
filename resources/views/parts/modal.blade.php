{{-- Modal Criar Tarefa --}}

<div class="modal fade" id="createTaskModal" tabindex="-1" aria-labelledby="createTaskModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="createTaskModalLabel">Criar tarefa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="createTaskForm" action="{{ route('tasks.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label class="col-form-label">Título:</label>
            <input name="title" type="text" class="form-control" placeholder="Ex: Estudar Laravel..." required>
          </div>
          <div class="mb-3">
            <label class="col-form-label">Descrição:</label>
            <textarea name="description" class="form-control" placeholder="Detalhes da tarefa..."></textarea>
          </div>
          <div class="mb-3">
            <div class="form-check form-switch">
              <input type="hidden" name="completed" value="0">
              <input type="checkbox" name="completed" class="form-check-input" value="1">
              <label class="form-check-label user-select-none">Marcar como concluída</label>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal" form="createTaskForm">Cancelar</button>
        <button type="submit" class="btn btn-primary" form="createTaskForm">Salvar</button>
      </div>
    </div>
  </div>
</div>

{{-- Fim Modal --}}

{{-- Modal Editar Tarefa --}}

<div class="modal fade" id="editTaskModal" tabindex="-1" aria-labelledby="editTaskModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editTaskModalLabel">Editar tarefa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editTaskForm" action="#" method="POST">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="task-title" class="col-form-label">Título:</label>
            <input name="title" type="text" class="form-control" id="task-title" placeholder="Ex: Estudar Laravel..." required>
          </div>
          <div class="mb-3">
            <label for="task-description" class="col-form-label">Descrição:</label>
            <textarea name="description" class="form-control" id="task-description" placeholder="Detalhes da tarefa..." required></textarea>
          </div>
          <div class="mb-3">
            <div class="form-check form-switch">
              <input type="hidden" name="completed" value="0">
              <input type="checkbox" name="completed" class="form-check-input" id="task-completed" value="1">
              <label class="form-check-label user-select-none" for="completed">Marcar como concluída</label>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" form="editTaskForm">Salvar</button>
      </div>
    </div>
  </div>
</div>

{{-- Fim Modal --}}

{{-- Modal SoftDelete Tarefa --}}

<div class="modal fade" id="deleteTaskModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ $active ? "Arquivar" : "Excluir"}} Tarefa</h1>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                  <h2 class="fs-5">Você tem certeza disso?</h2>
                  <small><em>Obs: Esta ação é irreversível.</em></small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form id="deleteTaskForm" action="#" method="post">
                  @csrf
                  @method('DELETE')
                  <input type="hidden" id="task-id" value="0">
                  <button type="submit" class="btn btn-{{ $active ? "warning" : "danger"}}">{{ $active ? "Arquivar" : "Excluir"}}</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Fim Modal --}}