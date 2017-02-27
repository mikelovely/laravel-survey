<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12 todo-list">
                <p v-if="!items.length">No items yet.</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Order</th>
                            <th>Mandatory</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in items">
                            <td>{{ item.title }}</td>
                            <td>{{ item.order }}</td>
                            <td>{{ item.mandatory ? 'yes' : 'no'  }}</td>
                            <td><a href="#" class="btn btn-danger" v-on:click="destroy(item)">Remove</a></td>
                        </tr>
                        <tr>
                            <td><input class="form-control" type="text" v-model="title"></td>
                            <td><input class="form-control" type="text" v-model="order"></td>
                            <td><input type="checkbox" name="{{ $field }}"{{ $value ? ' checked="checked"' : '' }} v-model="mandatory"></td>
                            <td><input class="btn btn-success" type="submit" value="Add item" @click.prevent="update"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                item: '',
                title: '',
                order: '',
                mandatory: true,
                items: [],
            }
        },
        props: {
            surveyId: null,
            groupId: null,
            questionId: null,
            indexSubQuestionRoute: null,
            storeSubQuestionRoute: null,
        },
        methods: {
            getSubQuestions () {
                this.$http.get(this.indexSubQuestionRoute).then((response) => {
                    this.items = response.json().data
                });
            },
            update() {
                var item = {
                    id: Date.now(),
                    title: this.title,
                    order: this.order,
                    mandatory: this.mandatory,
                    temporary: true
                };

                this.items.push(item);

                return this.$http.post(this.storeSubQuestionRoute, {
                    title: this.title,
                    order: this.order,
                    mandatory: this.mandatory,
                }).then((response) => {
                    this.title = '';
                    this.order = '';
                    this.mandatory = '';
                });
            },
            destroy(item) {
                if (!confirm('Are you sure you want to delete this sub question?')) {
                    return;
                }

                var newItems = this.items.filter(function (i) {
                    return item.id !== i.id;
                });

                this.items = newItems;

                this.$http.delete('/admin/surveys/' + this.surveyId + '/groups/' + this.groupId + '/questions/' + this.questionId + '/sub-questions/' + item.id);
            }
        },
        ready() {
            this.getSubQuestions()
        }
    }
</script>
