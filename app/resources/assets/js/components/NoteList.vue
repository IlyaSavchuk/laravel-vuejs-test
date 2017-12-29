<template>
    <div class="row">
        <div class="col-md-12" v-for="note in notes">
            <h1>{{note.name}}</h1>
            <button type="button" @click="deleteNote(note.id)" class="btn btn-danger">Delete</button>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            notes: {
                required: true,
                default: []
            }
        },
        mounted() {
        },
        methods: {
            deleteNote(id) {
                axios.delete('/api/notes/' + id)
                    .then(response => {
                        console.log(response.data)
                    })
                    .catch(response => {

                    });
            },
            addNote() {

            },
            saveNote() {

            }
        }
    }
</script>
