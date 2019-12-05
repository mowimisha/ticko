<template>
    <div class="container">
                    <div class="row">
                        @foreach ($posts as $post)
                            <div class="col-md-4">
                                <div class="panel panel-default" style="height:300px;">
                                    <div class="panel-heading"><strong>{{ $post->title }}</strong></div>

                                    <div class="panel-body" style="height:200px;">
                                        <div>
                                            <p><h5>{{ $post->description }}</h5></p>
                                        </div>

                                        <div>
                                            <p>{{ $post->location }}</p>
                                        </div>

                                        <div>
                                            <p><strong><h3>{{ $post->charges }}</h3></strong></p>
                                        </div>

                                        <div>
                                            <p><strong><i>{{ $post->dates }}</i></strong></p>
                                        </div>
                                    </div>

                                    <div class="panel-footer">
                                        <a href="{{ url('buyer-register') }}" class="btn btn-primary" type="submit">Book Ticket</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
