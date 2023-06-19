<template>
    <h1>
        Notification : {{ notification }}
    </h1>
</template>
<script>
export default {

    data() {
        return {
            notification: "",
        }
    },
    mounted() {


        console.log('open notification');

        Echo.channel('Notification')
            .listen('NotificationReceived',
                (e) => {
                    this.notification = e.notification;
                    console.log("NotificationReceived : " + e.notification);
                }
            );

        Echo.channel('events')
            .listen('RealTimeMessage',
                (e) => console.log("RealTimeMessage : " + e.notification)
            );

        Echo.private('event-private')
            .listen('RealTimeMessagePrivate',
                (e) => console.log("RealTimeMessagePrivate : " + e.notification)
            );

        Echo.private('App.Models.User.1')
            .notification((notification) => {
                console.log(notification.message);
            });

    }


}
</script>
