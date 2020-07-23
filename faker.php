<?php

declare(strict_types=1);

class Faker
{
    /**
     * Substitutes question marks in input string with random letters
     *
     * @param  string $string
     * @return string
     */
    public function letterify(string $string): string
    {
        $letters = 'abcdefghijklmnopqrstuvwxyz';
        $alpha = str_split($letters);
        $random = rand(0, (count($alpha)-1) );
        
        $output = array();
        $input = str_split($string);
        
        foreach($input as $char){
            if($char == '?'){
                $output[] = $alpha[$random];
                continue;
            }
			$output[] = $char;
        }
        $result = implode("", $output);
        
        return $result;  
    }

    /**
     * Substitutes hash symbols in input string with random digits
     *
     * @param  string $string
     * @return string
     */
    public function numerify(string $string): string
    {
        $output = array();
        $input = str_split($string);
        
        foreach($input as $char){
            if($char == '#'){
                $output[] = rand(0, 9);
                continue;
            }
            $output[] = $char;
        }
        $result = implode("", $output);
        
        return $result;  
    }

    /**
     * Substitutes question marks in input string with random letters, and
     * hash symbols with random digits
     *
     * @param  string $string
     * @return string
     */
    public function bothify(string $string): string
    {
        $input = $this->numerify($string);
        $output = $this->letterify($input);
        return $output;
    }
}
