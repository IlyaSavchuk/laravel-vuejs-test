@extends('layouts.app')

@section('content')
    <div id="app">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-success">
                                <div class="panel-body">
                                    <h4>Add note</h4>
                                    <v-input name="name" v-model="note.name" id="name">Name</v-input>
                                    <v-text-area name="content" v-model="note.content" :validate-disabled="true" id="content">
                                        Content
                                    </v-text-area>
                                    <v-file-select name="file" v-model="note.file"></v-file-select>
                                    <v-button classes="text-right" classes-btn="btn btn-success" @on-click="save">Save
                                    </v-button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" v-for="note in notes">

                            <div class="panel panel-info">
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <button class="btn btn-warning btn-xs" @click="edit(note.id)">
                                            <i class="glyphicon glyphicon-edit"></i>
                                        </button>
                                        <button class="btn btn-danger btn-xs" @click="remove(note.id)">
                                            <i class="glyphicon glyphicon-remove"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <h4>@{{note.name}} <span class="pull-right small">@{{note.updated_at}}</span></h4>
                                    <div class="text-center img-rounded" style="max-height: 100px; overflow: hidden">
                                        <img class="img-rounded" :src="note.file" alt="" width="100%">
                                    </div>
                                    <p>@{{note.content}}</p>
                                    <hr>
                                    <button class="btn btn-link" type="button" data-toggle="collapse"
                                            :data-target="`#note${note.id}`" aria-expanded="false"
                                            v-if="note.comments.length > 0">
                                        Comments
                                        <span>(@{{note.comments.length}})</span>
                                    </button>
                                    <div class="collapse" :id="`note${note.id}`">
                                        <div class="small">
                                            <div v-for="comment in note.comments">
                                                <p>@{{comment.author}}
                                                    <span class="pull-right">@{{comment.updated_at}}</span>
                                                </p>
                                                <p>@{{comment.content}}</p>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="small">
                                        <h5>Add comment</h5>
                                        <v-input name="author" placeholder="Author"
                                                 v-model="note.comment_author"></v-input>
                                        <v-text-area name="content" v-model="note.comment_content"
                                                     placeholder="Content" :rows="2"></v-text-area>
                                        <v-button classes="pull-right" classes-btn="btn btn-success btn-sm"
                                                  @click="addComment(note)">Add
                                            comment
                                        </v-button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection