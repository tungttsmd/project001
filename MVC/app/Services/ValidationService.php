<?php
trait ValidationService
{
    use BaseService;
    private $isValid = true;
    # set validation
    public function valid($isValid): self
    {
        $this->isValid = $isValid;

        return $this;
    }
    public function validation()
    {
        if (!$this->isValid) {
            return $this->error('VALID_FAILED', 'Validation failed');
        }
    }
}
