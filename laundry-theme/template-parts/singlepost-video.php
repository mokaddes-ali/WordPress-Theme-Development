 <?php
 /**
  * single video template
  */
  if (get_post_format() == 'video'):
                        $content = apply_filters('the_content', get_the_content());

                        $video_found = false;
                        $video_url   = '';

                        //iframe detect
                        if (preg_match('/<iframe.*?src=["\'](.*?)["\'].*?<\/iframe>/', $content, $matches)) {
                            $video_url   = $matches[1];
                            $video_found = true;
                        }
                    ?>
                        <div class="relative py-5 w-full h-auto aspect-[1160/570]">
                            <?php if ($video_found): ?>
                                <iframe class="w-full h-full aspect-video" src="<?php echo esc_url($video_url); ?>?autoplay=0"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                            <?php endif; ?>
                        </div>

                    <?php endif; ?>