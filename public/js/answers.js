new Vue({

    el: '.todo-list',
    data: {
        item: '',
        code: '',
        answer_text: '',
        order: '',
        visable: '',
        items: [],
    },
    methods: {
        addItem: function (survey, group, question) {
            var item = {
                id: Date.now(),
                code: this.code,
                answer_text: this.answer_text,
                order: this.order,
                visable: this.visable,
                temporary: true
            };

            this.items.push(item);

            $.ajax({
                url: '/admins/surveys/' + survey + '/groups/' + group + '/questions/' + question + '/answers',
                type: 'post',
                cache: false,
                data: {
                    code: this.code,
                    answer_text: this.answer_text,
                    order: this.order,
                    visable: this.visable,
                }
            });

            this.code = '';
            this.answer_text = '';
            this.order = '';
            this.visable = '';
        },
        removeItem: function (item) {

            var newItems = this.items.filter(function (i) {
                return item.id !== i.id;
            });

            this.items = newItems;

            if (!item.temporary) {
                $.ajax({
                    url: '/admins/delete',
                    type: 'delete',
                    cache: false,
                    data: {
                        id: item.id
                    }
                });
            }
        }
    },
    ready: function () {

        // Get URL
        var url = window.location.href

        // Define string paths to match before and after ID
        var path_before = 'questions/'
        var path_after = '/answers'

        // Get string index of start and end of ID
        var pos_before = url.search(path_before) + path_before.length
        var pos_after = url.search(path_after)

        // Get ID from URL
        var question_id = url.substring(pos_before, pos_after)

        $.ajax({
            url: '/admins/get-all?question_id=' + question_id,
            type: 'get',
            cache: false
        }).success(function (data) {
            this.items = data;
        }.bind(this));
    }
});
