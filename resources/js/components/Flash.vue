<template>
<div>
    <strong></strong>
</div>
</template>
<script>
export default {
    name: 'Flash',
    props: ['userid'],
    created() {
        Echo.private('User.Notification.' + this.userid)
            .listen('userNotificationEvent', (e)  => {

                if (e['eventcode'] === 100) {
                    //this.getGateways();
                    //console.log('i trigger');
                     }

                this.$root.$emit('eventcode',e['eventcode']);

                $.notify({
                    // options
                    message: e['message']
                },{
                    // settings
                    type: e['type'],

                    offset: {
                        x: 15,
                        y: 15
                    },
                    delay: 1500,
                    timer: 1500
                });
            })
    }

}
</script>