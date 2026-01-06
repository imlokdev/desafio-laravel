// Tooltip Config
const tooltipTriggerList = document.querySelectorAll('[data-bs-title')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

// editModal
const editModal = document.getElementById('editTaskModal')
if (editModal) {
    editModal.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget

        const id = button.getAttribute('data-bs-taskId')
        const title = button.getAttribute('data-bs-taskTitle')
        const description = button.getAttribute('data-bs-taskDesc')
        const completed = button.getAttribute('data-bs-taskToggle')

        const form = editModal.querySelector('#editTaskForm')
        const modalTitleInput = editModal.querySelector('#task-title')
        const modalDescriptionInput = editModal.querySelector('#task-description')
        const modalCompletedInput = editModal.querySelector('#task-completed')

        form.action = `/tasks/${id}`
        modalTitleInput.value = title
        modalDescriptionInput.value = description
        modalCompletedInput.checked = (completed == "1" || completed == "true")
    })
}

// deleteModal
const deleteModal = document.getElementById('deleteTaskModal')
if (deleteModal) {
    deleteModal.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget
        const id = button.getAttribute('data-bs-taskId')
        const form = deleteModal.querySelector('#deleteTaskForm')
        
        form.action = `/archives/${id}`
    })
}

const array = [
    {"nameModal": "createTaskModal", "btnText": "Criando"},
    {"nameModal": "editTaskModal", "btnText": "Salvando"},
    {"nameModal": "deleteTaskModal", "btnText": "Excluindo"}
];

array.forEach(function (item) {
    const modal = document.getElementById(item["nameModal"])
    if (modal) {
        const content = modal.querySelector('.modal-dialog .modal-content')
        const form = modal.querySelector('.modal-body form')

        if (form) {
            form.addEventListener('submit', function(event) {
                
                let submitBtn = content.querySelector('.modal-footer button[type="submit"]')
                let resetBtn = content.querySelector('.modal-footer button[type="reset"]')
                let closeBtn = content.querySelector('.modal-header button')
        
                if (submitBtn) {
                    submitBtn.disabled = true
                    submitBtn.innerHTML = `<i class="fas fa-spinner fa-spin"></i> ${item["btnText"]}...`
                }
                if (resetBtn) resetBtn.disabled = true
                if (closeBtn) closeBtn.disabled = true
            })
        }
    }
})

// Botoes do index desabilitar
const buttons = document.querySelectorAll('.btn')

buttons.forEach(function(button) {
    button.addEventListener('click', function(e) {
        if (this.tagName === 'A') return
        if (!this.className.includes('btn-outline-warning') && !this.className.includes('btn-outline-success')) return

        if (this.type === 'submit') {
            const form = this.closest('form')
            
            setTimeout(() => {
                buttons.forEach(btn => {
                    if (btn.tagName === 'BUTTON') btn.disabled = true
                    else if (btn.tagName === 'A') {
                        btn.classList.add('disabled')
                        btn.style.pointerEvents = 'none'
                    }
                })
                this.innerHTML = '<i class="bi bi-hourglass-split"></i>';
            }, 0)
        }
    })
})