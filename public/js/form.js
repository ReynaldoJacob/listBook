var app = new Vue({
    el: "#book-list",
    data: {
        books: [],
        form: {
            author: "",
            title: "",
            edition: "",
            publication_data: "",
            content_type: "",
            restrictions: "",
            subject: "",
            provider: "",
        }
    },
    mounted() {
    },
    methods: {

        saveBook() {
            let self = this;

            axios.post('/saveBook', {
                    author: self.form.author,
                    title: self.form.title,
                    edition: self.form.edition,
                    publication_data: self.form.publication_data,
                    content_type: self.form.content_type,
                    restrictions: self.form.restrictions,
                    subject: self.form.subject,
                    provider: self.form.provider
                })
                .then(response => {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'El libro se registro con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(response => {
                    
                    })
                })
                .catch(error => console.error(error));
        }
    }
});