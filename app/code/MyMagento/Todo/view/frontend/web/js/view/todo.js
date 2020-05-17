define([
    'uiComponent',
    'jquery',
    'Magento_Ui/js/modal/confirm',
    'MyMagento/js/service/task'
], function (Component, $, modal, taskService) {
    'use strict';
    return Component.extend({
        defaults: {
            newTaskLabel: '',
            buttonSelector: '#add-new-task-button',
            tasks: []
        },

        initObservable: function () {
            this._super().observe(['tasks', 'newTaskLabel']);
            let self = this;
            taskService.getList().then(function (tasks) {
                self.tasks(tasks);
                return tasks;
            });
            return this;
        },
        switchStatus: function (data, event) {
            const taskId = $(event.target).data('id');

            let items = this.tasks().map((task) => {
                if (task.task_id === taskId) {
                    task.status = task.status === 'open' ? 'complete' : 'open';
                }
                return task;
            });

            this.tasks(items);
        },
        addTask: function () {
            this.tasks.push({
                id: Math.floor(Math.random() * 100),
                label: this.newTaskLabel(),
                status: false,
            });
            this.newTaskLabel('');
        },
        deleteTask: function (taskId) {
            let self = this;
            modal({
                content: 'Are you sure want to delete the task?',
                actions: {
                    confirm: function () {
                        let tasks = [];
                        if (self.tasks().length === 1) {
                            self.tasks(tasks);
                            return;
                        }
                        self.tasks().forEach((task) => {
                            if (task.task_id !== taskId) {
                                tasks.push(task);
                            }
                        });
                        self.tasks(tasks);
                    }
                }
            });
        },
        checkKey: function (data, event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                $(this.buttonSelector).click();
            }
        }
    });
});