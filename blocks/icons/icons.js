document.addEventListener("DOMContentLoaded", () => {
  document.querySelector('#icons-filter')?.addEventListener('input', (e) => {
    document.querySelectorAll('[data-icon-name]').forEach((item) => {
      if (item.dataset.iconName?.includes(e.target.value)) {
        item.classList.remove('hidden')
      } else {
        item.classList.add('hidden')
      }
    })
  })
})
