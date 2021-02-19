
 <?php

   
            $estrategias = [];

            if(isset($_POST["estrategias"])){
                $estrategias = $_POST["estrategias"];
            }
            ?>
        
          <section>
                <form method="post"  > 
                   <article class="art2" >
                        <h2>Obetivos Estrategicos</h2>
                            
                    
                            <div class="regs" id="arts2" > 
                            <?php
                            
                                foreach ($estrategias as $estrategia){
                                    ?>
                                    <input value="<?php echo $estrategia?>" type="text" name="estrategias[]">
                                            <br>
                                    <?php
                                }
                            ?>
                                <input autocomplete="off" autofocus value="" type="text" name="estrategias[]">
                                <button name="agregar"  ><img src="mix/bxs-bookmark-alt-plus.svg" alt=""></button>
            
                            </div>
                    </article>  
                </form>   
                
        
                           
                </section>