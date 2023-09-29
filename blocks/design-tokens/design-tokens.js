document.addEventListener("DOMContentLoaded", () => {
  document.querySelector('#token-theme-switcher')?.addEventListener('change', (e) => {

    document.querySelectorAll('.token-data-container').forEach((item) => {
      const valueDefault = item?.getAttribute('data-default');
      const valueDark = item?.getAttribute('data-dark');
      const valueContrast = item?.getAttribute('data-contrast');
      const valueContainer = item?.querySelector('.token-data-value');
      const exampleContainer = item?.querySelector('.token-data-example');

      if (e.target.value === 'default' && valueDefault) {
        if (valueContainer) {
          valueContainer.innerHTML = valueDefault;
        }
        if (exampleContainer) {
          exampleContainer.style.backgroundColor = valueDefault;
        }
      }
      if (e.target.value === 'dark' && valueDark) {
        if (valueContainer) {
          valueContainer.innerHTML = valueDark;
        }
        if (exampleContainer) {
          exampleContainer.style.backgroundColor = valueDark;
        }
      }
      if (e.target.value === 'contrast' && valueContrast) {
        if (valueContainer) {
          valueContainer.innerHTML = valueContrast;
        }
        if (exampleContainer) {
          exampleContainer.style.backgroundColor = valueContrast;
        }
      }
    })
  })
})
