define([
    'uiComponent',
    'jquery',
    'Magento_Ui/js/modal/confirm',
    'MyMagento_Todo/js/service/task',
    'MyMagento_Todo/js/model/loader'
], function (Component, $, modal, taskService, loader) {
    'use strict';
    return Component.extend({
        defaults: {
            newTaskLabel: '',
            tasksEmpty: false,
            buttonSelector: '#add-new-task-button',
            tasks: []
        },

        initObservable: function () {
            this._super().observe(['tasks', 'newTaskLabel', 'tasksEmpty']);
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
                    taskService.update(taskId, task.status);
                }
                return task;
            });

            this.tasks(items);
        },
        addTask: function () {
            const self = this;
            var task = {
                label: this.newTaskLabel(),
                status: 'open',
            }
            loader.startLoader();
            taskService.create(task)
                .then((taskId) => {
                    task.task_id = taskId;
                    self.tasks.push(task);
                    self.tasksEmpty(false);
                    self.newTaskLabel('');
                })
                .finally(() => {
                    loader.stopLoader();
                });
        },
        deleteTask: function (taskId) {
            let self = this;
            modal({
                content: 'Are you sure want to delete the task?',
                actions: {
                    confirm: function () {
                        let tasks = [];
                        taskService.delete(self.tasks().find((task) => {
                            if (task.task_id === taskId) {
                                return task;
                            }
                        }));
                        if (self.tasks().length === 1) {
                            self.tasks(tasks);
                            self.tasksEmpty(true);
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