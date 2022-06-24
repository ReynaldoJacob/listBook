var app = new Vue({
    el: "#book-list",
    data: {
        books: [],
        modal: {
            id: "",
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

        this.getBooks();
    },
    methods: {

        getBooks() {
            let self = this
            axios.get('/getBooks')
                .then(response => {
                    let info = response.data
                    self.books = info
                })
                .catch(error => console.error(error));
        },

        deleteBook(id) {
            let self = this;

            axios.post('/deleteBook', {
                    book_id: id
                })
                .then(response => {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'El libro se elimino con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(response => {
                        self.getBooks();
                    })
                })
                .catch(error => console.error(error));
        },

        editBook(id) {
            let self = this;

            axios.get('/getInfoBook', {
                    params: {
                        book_id: id
                    }
                })
                .then(response => {
                    let info = response.data;
                    self.modal.id = info.id,
                    self.modal.author = info.author
                    self.modal.title = info.title
                    self.modal.edition = info.edition
                    self.modal.publication_data = info.publication_data
                    self.modal.content_type = info.content_type
                    self.modal.restrictions = info.restrictions
                    self.modal.subject = info.subject
                    self.modal.provider = info.provider

                    $("#staticBackdrop").modal("show");
                })
                .catch(error => console.error(error));
        },

        saveEditBook(id) {
            let self = this;

            axios.post('/saveEditBook', {
                    book_id: id,
                    author: self.modal.author,
                    title: self.modal.title,
                    edition: self.modal.edition,
                    publication_data: self.modal.publication_data,
                    content_type: self.modal.content_type,
                    restrictions: self.modal.restrictions,
                    subject: self.modal.subject,
                    provider: self.modal.provider
                })
                .then(response => {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'El libro se actualizo con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(response => {
                        self.getBooks();
                    })
                })
                .catch(error => console.error(error));
        }
    }
});
