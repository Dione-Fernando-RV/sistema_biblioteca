async function buscaCursoDisciplina(element) {
    const cursoId = Number(element.value);

    if(!cursoId) return;

    const { data } = await axios.get(`${BASE_URL}admin/curso-disciplinas/busca-disciplina/${cursoId}`);

    $('#curso-disciplina-id').empty().append($('<option>', { value : '' }).text('Selecione'));

    data.forEach(option => {
        $('#curso-disciplina-id').append($('<option>', { value : '' }));

        $('#curso-disciplina-id')
            .append($('<option>', { value : option.id })
            .text(option.nome));
    });
}
