window.onload = () => {
    /* 
    CODIGO PARA GENERAR REPORTE
    */
    // Escuchamos el click del botón
    const boton = document.querySelector('.btnGenerarReporte');
    if (boton) {
        this.addEventListener("click", () => {
            const $elementoParaConvertir = document.querySelector("#jpdf"); // <-- Aquí puedes elegir cualquier elemento del DOM
            html2pdf()
                .set({
                    margin: 1,
                    filename: 'Reporte.pdf',
                    image: {
                        type: 'jpeg',
                        quality: 0.98
                    },
                    html2canvas: {
                        scale: 3, // A mayor escala, mejores gráficos, pero más peso
                        letterRendering: true,
                    },
                    jsPDF: {
                        unit: "in",
                        format: "a3",
                        orientation: 'portrait' // landscape o portrait
                    }
                })
                .from($elementoParaConvertir)
                .save()
                .catch(err => console.log(err));
        });
    }

}