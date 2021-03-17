const changeAdminAttribute = (id) => {
    (
        async () => {
            const response = await fetch('/admin/adminStatus',{
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json;charset=utf-8',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                body: JSON.stringify({
                    id: id
                })
            });

            const answer = await response.json();
            alert(answer.message);
        }
    )();
}

