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