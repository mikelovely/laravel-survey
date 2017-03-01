<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12 todo-list">
                <p v-if="!items.length">No items yet.</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Value</th>
                            <th>Code</th>
                            <th>Text</th>
                            <th>Order</th>
                            <th>Visable</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in items">
                            <td>{{ item.value }}</td>
                            <td>{{ item.code }}</td>
                            <td>{{ item.answer_text }}</td>
                            <td>{{ item.order }}</td>
                            <td>{{ item.visable ? 'yes' : 'no' }}</td>
                            <td><a href="#" class="btn btn-danger" v-on:click="destroy(item)">Remove</a></td>
                        </tr>
                        <tr>
                            <td><input class="form-control" type="text" v-model="value"></td>
                            <td><input class="form-control" type="text" v-model="code"></td>
                            <td><input class="form-control" type="text" v-model="answer_text"></td>
                            <td><input class="form-control" type="text" v-model="order"></td>
                            <td><input type="checkbox" name="{{ $field }}"{{ $value ? ' checked="checked"' : '' }} v-model="visable"></td>
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
                value: '',
                code: '',
                answer_text: '',
                order: '',
                visable: true,
                items: [],
            }
        },
        props: {
            surveyId: null,
            groupId: null,
            questionId: null,
            indexAnswerRoute: null,
            storeAnswerRoute: null,
        },
        methods: {
            getAnswers () {
                this.$http.get(this.indexAnswerRoute).then((response) => {
                    this.items = response.json().data
                });
            },
            update() {
                var item = {
                    id: Date.now(),
                    value: this.value,
                    visable: this.visable,
                    code: this.code,
                    answer_text: this.answer_text,
                    order: this.order,
                    temporary: true
                };

                this.items.push(item);

                return this.$http.post(this.storeAnswerRoute, {
                    value: this.value,
                    code: this.code,
                    answer_text: this.answer_text,
                    order: this.order,
                    visable: this.visable,
                }).then((response) => {
                    this.value = '';
                    this.code = '';
                    this.answer_text = '';
                    this.order = '';
                    this.visable = '';
                });
            },
            destroy(item) {
                if (!confirm('Are you sure you want to delete this answer option?')) {
                    return;
                }

                var newItems = this.items.filter(function (i) {
                    return item.id !== i.id;
                });

                this.items = newItems;

                this.$http.delete('/admin/surveys/' + this.surveyId + '/groups/' + this.groupId + '/questions/' + this.questionId + '/answers/' + item.id);
            }
        },
        ready() {
            this.getAnswers()
        }
    }
</script>
